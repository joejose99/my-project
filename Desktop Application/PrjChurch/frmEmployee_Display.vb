Imports System.Data.OleDb
Public Class frmEmployee_Display

    Private Sub frmEmployee_Display_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Height = 540
        Me.Width = 954
        Me.Left = 0
        Me.Top = 100

        Me.MdiParent = mdiChurch
    End Sub



    Private Sub frmStudentOld_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmEmployee_Display_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try

            Me.Height = 540
            Me.Width = 954
            Me.Left = 0
            Me.Top = 100

            Me.MdiParent = mdiChurch

            Call StartForm()
            Dim ro As Integer = 0
            Call conns()


            Call conns()
            TextBox1.Items.Clear()
            TextBox1.Text = ""

            ' str_sql_user_select = "SELECT DISTINCT(vSection)AS [RecordYear]  FROM student "
            str_sql_user_select = "SELECT  DISTINCT(vDepartStaffCode)AS [RecordYear]FROM Employee "



            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            'Dim ro As Integer = 0
            While myAccessReader.Read()

                TextBox1.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                ro += 1
                ross += 1
            End While
            strconss.Close()
            myAccessReader.Close()
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub



    Private Sub dtptEdit_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellContentClick

    End Sub
    Private stid As String
    Private id As Integer
    Private code As String
    Private classs As String

    Private Sub dtptEdit_CellDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellDoubleClick
        ' stid = ""
        stid = dtptEdit.CurrentRow.Cells(0).Value()
        id = CInt(dtptEdit.CurrentRow.Cells(21).Value())
        code = dtptEdit.CurrentRow.Cells(16).Value()
        classs = dtptEdit.CurrentRow.Cells(5).Value()
    End Sub
    Private Sub dtptEdit_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtptEdit.DoubleClick
        ' stid = ""
        stid = dtptEdit.CurrentRow.Cells(0).Value()

        id = CInt(dtptEdit.CurrentRow.Cells(21).Value())

        code = dtptEdit.CurrentRow.Cells(16).Value()
        classs = dtptEdit.CurrentRow.Cells(5).Value()
    End Sub
    Private _semSec As String

    Private rowme As String
    Private depart_name As String
    Private Sub depts()
        Dim ro As Integer
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee] where  vDepartStaffCode= '" & Trim(TextBox1.Text) & "" & "' "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")

            End While
            myAccessReader.Close()


            If rows <> 0 Then

                Call conns()
                ro = 0
                str_sql_user_select = "select * from DepartStaff  where vDepartStaffCode= '" & Trim(TextBox1.Text) & "" & "'  "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                While myAccessReader.Read()
                    depart_name = myAccessReader("vDepartName")

                    ro += 1


                End While
                strconss.Close()
            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub requery()
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee] where  vDepartStaffCode= '" & Trim(TextBox1.Text) & "" & "' "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Employee  where vDepartStaffCode= '" & Trim(TextBox1.Text) & "" & "'  "


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                If rows = 0 Then
                    MsgBox("Data not Existing ", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                ' Dim ro As Integer = 0
                While myAccessReader.Read()

                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vPosCode")
                    'dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vTeachingStaff")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vSalGrade")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("dEmpdate")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vQualif")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("dEmpBdate")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHow_Know")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vLSch_Attended")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vNear_to_kin")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("vDepartStaffCode")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("vProfession")
                    dtptEdit.Rows(ro).Cells(19).Value = myAccessReader("vGrade")
                    dtptEdit.Rows(ro).Cells(20).Value = myAccessReader("vNear_to_kinAdd")
                    'dtptEdit.Rows(ro).Cells(23).Value = myreader("vcouseCode")
                    dtptEdit.Rows(ro).Cells(21).Value = myAccessReader("id")


                    ' dtptEdit.Rows(ro).Cells(22).Value = myreader("vSalGrade")

                    'dtptEdit.Rows(ro).Cells(22).Value = myreader("id")
                    'dtptEdit.Rows(ro).Cells(23).Value = myreader("vcouseCode")



                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While
                strconss.Close()

            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub StartForm()
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee]  "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            Label5.Text = rows

            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Employee"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                'If rows = 0 Then
                'MsgBox("Data not Existing ", MsgBoxStyle.Information, "Information")
                'Exit Sub
                'End If
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                ' Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vPosCode")
                    'dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vTeachingStaff")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vSalGrade")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("dEmpdate")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vQualif")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("dEmpBdate")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHow_Know")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vLSch_Attended")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vNear_to_kin")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("vDepartStaffCode")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("vProfession")
                    dtptEdit.Rows(ro).Cells(19).Value = myAccessReader("vGrade")
                    dtptEdit.Rows(ro).Cells(20).Value = myAccessReader("vNear_to_kinAdd")

                    ' dtptEdit.Rows(ro).Cells(22).Value = myreader("vSalGrade")

                    dtptEdit.Rows(ro).Cells(21).Value = myAccessReader("id")



                    ro += 1

                    'End If
                End While
                strconss.Close()

            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub TextBox1_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs)
        'frmStpuup.Show()
        'frmStpuup.BringToFront()
    End Sub








    Private Sub TextBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox1.SelectedIndexChanged
        Try

            depts()
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee] where  vDepartStaffCode= '" & Trim(TextBox1.Text) & "" & "' "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            Label6.Text = rows
            Label8.Text = depart_name

            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Employee  where vDepartStaffCode= '" & Trim(TextBox1.Text) & "" & "' "


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                ' Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vPosCode")
                    'dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vTeachingStaff")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vSalGrade")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("dEmpdate")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vQualif")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("dEmpBdate")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHow_Know")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vLSch_Attended")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vNear_to_kin")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("vDepartStaffCode")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("vProfession")
                    dtptEdit.Rows(ro).Cells(19).Value = myAccessReader("vGrade")
                    dtptEdit.Rows(ro).Cells(20).Value = myAccessReader("vNear_to_kinAdd")
                    'dtptEdit.Rows(ro).Cells(23).Value = myreader("vcouseCode")
                    dtptEdit.Rows(ro).Cells(21).Value = myAccessReader("id")



                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1
                    ross += 1
                    'End If
                End While
                strconss.Close()

            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub


    Private Sub Panel1_Paint(ByVal sender As System.Object, ByVal e As System.Windows.Forms.PaintEventArgs) Handles Panel1.Paint

    End Sub

    Private Sub butDel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDel.Click
        Try
            Dim Choice As String
            Choice = MsgBox("Are you sure you want to Delete Employee?", vbYesNo + vbInformation, "Delete")
            If Choice = vbYes Then
                Call conns()
                str_sql_user_select = "Delete  [Employee] where vEmpid='" & stid & "'"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                myAccessReader.Close()
                MsgBox("Data has been Deleted", MsgBoxStyle.Information, "Information")

                strconss.Close()
                Call requery()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private ross As Integer
    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try
            Call conns()
            Dim ro As Integer = 0
            Dim rows As Integer = 0
            Dim code As String = ""
            ro = 0
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee]"
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            Call conns()
            code = dtptEdit.Rows(ro).Cells(0).Value
            While rows > ro
                If stid = code Then
                    For i As Integer = 0 To dtptEdit.RowCount - 1


                        Dim sqlString As String
                        sqlString = "UPDATE  [Employee] SET " & _
                                "vSurname='" & dtptEdit.Rows(ro).Cells(1).Value & "'," & _
                                "vfName='" & dtptEdit.Rows(ro).Cells(2).Value & "'," & _
                                "vMidName='" & dtptEdit.Rows(ro).Cells(3).Value & "'," & _
                                "vSalGrade='" & dtptEdit.Rows(ro).Cells(5).Value & "'," & _
                                "vEmail='" & dtptEdit.Rows(ro).Cells(6).Value & "'," & _
                                 "vMobile='" & dtptEdit.Rows(ro).Cells(7).Value & "'," & _
                                "vGender='" & dtptEdit.Rows(ro).Cells(8).Value & "'," & _
                                "vAddress='" & dtptEdit.Rows(ro).Cells(9).Value & "'," & _
                                 "dEmpdate='" & dtptEdit.Rows(ro).Cells(10).Value & "'," & _
                                "vQualif='" & dtptEdit.Rows(ro).Cells(11).Value & "'," & _
                                "dEmpBdate='" & dtptEdit.Rows(ro).Cells(12).Value & "'," & _
                                "vHow_Know='" & dtptEdit.Rows(ro).Cells(13).Value & "'," & _
                                "vLSch_Attended='" & dtptEdit.Rows(ro).Cells(14).Value & "'," & _
                                "vNear_to_kin='" & dtptEdit.Rows(ro).Cells(15).Value & "'," & _
                                "vDepartStaffCode='" & dtptEdit.Rows(ro).Cells(16).Value & "'," & _
                                "vHPhone='" & dtptEdit.Rows(ro).Cells(17).Value & "'," & _
                                "vProfession='" & dtptEdit.Rows(ro).Cells(18).Value & "'," & _
                                "vGrade='" & dtptEdit.Rows(ro).Cells(19).Value & "'," & _
                                "vNear_to_kinAdd='" & dtptEdit.Rows(ro).Cells(20).Value & "'," & _
                                "vPosCode='" & dtptEdit.Rows(ro).Cells(21).Value & "'" & _
                                 "where  vEmpid ='" & stid & "' and  id=" & id & " "

                        comUserSelectS = New OleDbCommand(sqlString, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()






                    Next i

                    MsgBox("Data has been Edited", MsgBoxStyle.DefaultButton1, "Edit")
                    If TextBox1.Text <> "" Then
                        requery()
                        'query()
                    End If


                    If TextBox1.Text = "" Then

                        StartForm()
                    End If
                    Exit Sub
                    mycon.Close()
                End If
                ro += 1
                code = dtptEdit.Rows(ro).Cells(0).Value
                ' ross += 1
            End While


            strconss.Close()



            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try


    End Sub

    Private Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee]  "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

           
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                'rowme = myreader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            Label6.Text = ""
            Label8.Text = "Department"
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Employee"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))



                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                ' Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vPosCode")
                    'dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vTeachingStaff")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vSalGrade")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("dEmpdate")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vQualif")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("dEmpBdate")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHow_Know")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vLSch_Attended")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vNear_to_kin")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("vDepartStaffCode")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("vProfession")
                    dtptEdit.Rows(ro).Cells(19).Value = myAccessReader("vGrade")
                    dtptEdit.Rows(ro).Cells(20).Value = myAccessReader("vNear_to_kinAdd")
                    'dtptEdit.Rows(ro).Cells(23).Value = myreader("vcouseCode")
                    dtptEdit.Rows(ro).Cells(21).Value = myAccessReader("id")
                    ro += 1

                    'End If
                End While
                strconss.Close()

                TextBox1.Text = ""

                CheckBox1.Checked = False
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub QueryClass()
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee] where  vDepartCode= '" & Trim(TextBox1.Text) & "" & "' "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Employee  where vDepartStaffCode= '" & Trim(code) & "" & "' "


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))

                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                ' Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vPosCode")
                    'dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vTeachingStaff")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vSalGrade")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("dEmpdate")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vQualif")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("dEmpBdate")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHow_Know")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vLSch_Attended")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vNear_to_kin")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("vDepartStaffCode")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("vProfession")
                    dtptEdit.Rows(ro).Cells(19).Value = myAccessReader("vGrade")
                    dtptEdit.Rows(ro).Cells(20).Value = myAccessReader("vNear_to_kinAdd")

                    dtptEdit.Rows(ro).Cells(21).Value = myAccessReader("id")
                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While
                strconss.Close()


            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        dtptEdit.Rows.Clear()
        TextBox1.Text = ""
        TextBox2.Text = ""
        TextBox3.Text = ""

    End Sub
    Private numb As Integer
    Private X1 As Integer
    Private X2 As Integer
    Private W2 As Integer
    Private W1 As Integer
    Private W3 As Integer
    Private X3 As Integer

    Public Sub PrintBIll()
        ' Dim Y As Integer


        Dim PSize As Integer = ListItems.Items.Count
        'Dim PSize As Integer = numb
        Dim PHi As Double

        With PrintDocument1.DefaultPageSettings
            Dim Ps As Printing.PaperSize
            PHi = PSize * 20 + 350
            Ps = New Printing.PaperSize("Student Details", 800, 1000)
            .Margins.Top = 15
            .Margins.Bottom = 20
            .PaperSize = Ps
        End With

        headfont = New Font("Courier New", 16, FontStyle.Bold)
        tablefont = New Font("Times New Roman", 8, FontStyle.Bold)
        titlefont = New Font("Times New Roman", 8)
        X1 = PrintDocument1.DefaultPageSettings.Margins.Left
        'X1 = X1 + 10
        Dim pageWidth As Integer

        With PrintDocument1.DefaultPageSettings
            pageWidth = .PaperSize.Width - .Margins.Left - .Margins.Right
        End With

        X2 = X1 + 120
        X3 = X2 + pageWidth * 0.5
        W1 = X2 - X1
        W2 = X3 - X2
        W3 = pageWidth - X3

        If printNo = 0 Then
            PrintPreviewDialog1.Document = PrintDocument1
            PrintPreviewDialog1.ShowDialog()

        End If
        If printNo = 1 Then

            PrintDocument1.PrintController = New Printing.StandardPrintController
            PrintDocument1.Print()

        End If
    End Sub
    Private headfont As New Font("Arial", 14)
    Private tablefont As New Font("Arial", 9)
    Private titlefont As New Font("Times New Roman", 9)
    Private itm As Integer
    Private str As String
    Private Y As Integer
    ' Dim X1 As Integer
    'Dim X2 As Integer
    'Dim W2 As Integer
    ' Private str As String

    Private Yc As Integer

    Private ctr_pay As Integer
    Private counts_pay As Integer
    Private count_pay As Integer
    Private numbs_pay As Integer
    Private array_STId(array_STId1) As String
    Private nos As Integer
    Private array_STId1 As Integer
    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage

        Try
            Dim rowsOrder As Integer = 0
            Dim lines, Cols As Integer
            Dim ro As Integer = 0
            str = ""
            Yc = 0
            lines = 0
            Cols = 0

            ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 1


            ' e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)



            If code = "" And TextBox1.Text <> "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Employee where vDepartStaffCode = '" & TextBox1.Text.Trim & "'" & ""
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                strconss.Close()



                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *  FROM Employee where vDepartStaffCode = '" & TextBox1.Text.Trim & "'" & ""

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("vEmpid")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("vEmpid") & ""))

                            nos += 1
                            ro += 1
                        End While

                    End While

                    strconss.Close()

                End If

            End If

            Dim studentid As String = ""




            ' e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)

            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 120, Y + 40)

            e.Graphics.DrawString("EMPLOYEE DETAILS", headfont, Brushes.Black, X1 + 120, Y + 70)


            '############# COURSE SELECTION

            If code = "" And TextBox1.Text <> "" Then
                'Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                    .PaperSize.Width - .Margins.Right, Y + 95)
                End With

                e.Graphics.DrawString("EMPLOYEE ID: ", tablefont, Brushes.Black, CInt(X1 + 25), CInt(Y) + 110)

                e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 110)

                e.Graphics.DrawString("FIRST NAME: ", tablefont, Brushes.Black, CInt(X1 + 195), CInt(Y) + 110)

                e.Graphics.DrawString("DEPARTMENT: ", tablefont, Brushes.Black, CInt(X1 + 285), CInt(Y) + 110)

                e.Graphics.DrawString("GENDER: ", tablefont, Brushes.Black, CInt(X1 + 375), CInt(Y) + 110)

                ' e.Graphics.DrawString("DATE: ", tablefont, Brushes.Black, CInt(X1 + 405), CInt(Y) + 110)

                e.Graphics.DrawString("MOBILE NO: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)




                For Each i As String In Me.ListItems.Items(itm).ToString

                    studentid = Me.ListItems.Items(itm).ToString


                    Call conns()

                    str_sql_user_select = "SELECT  *  FROM  EMPLOYEE where vDepartStaffCode = '" & TextBox1.Text & "' and vEmpid = '" & studentid & "'"





                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()




                    While myAccessReader.Read
                        numbs_pay += 1
                        e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                        e.Graphics.DrawString(myAccessReader("vEmpid"), titlefont, Brushes.Black, CInt(X1 + 30), CInt(Y) + 130)


                        'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                        'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                        e.Graphics.DrawString(myAccessReader("vSURNAME"), titlefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 130)


                        e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1 + 195), CInt(Y) + 130)

                        e.Graphics.DrawString(depart_name, titlefont, Brushes.Black, CInt(X1 + 285), CInt(Y) + 130)





                        e.Graphics.DrawString(myAccessReader("vGender"), titlefont, Brushes.Black, CInt(X1 + 380), CInt(Y) + 130)



                        'e.Graphics.DrawString(myreader("vset"), titlefont, Brushes.Black, CInt(X1 + 404), CInt(Y) + 130)

                        e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, CInt(X1 + 460), CInt(Y) + 130)


                        Y += PrintDocument1.DefaultPageSettings.Margins.Top + 5

                        ro += 1

                        count_pay += 1
                        ctr_pay += 1
                        itm += 1

                        If itm = rowsOrder Then
                            itm = 0
                            counts_pay = 0
                            count_pay = 0
                            numbs_pay = 0
                            ctr_pay = 0
                            nos = 0
                            e.HasMorePages = False
                            Exit For
                        End If

                        If count_pay >= 16 Then
                            e.HasMorePages = True
                            counts_pay += count_pay

                            count_pay = 0
                            Exit Sub
                        Else
                            e.HasMorePages = False
                            'counts = 0
                        End If
                        If count_pay = 0 Then
                            e.HasMorePages = False
                        End If



                    End While


                Next
                If count_pay <> 16 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If

            End If








            If code <> "" And classs <> "" Then

                Call conns()

                ro = 0
                str_sql_user_select = "SELECT * FROM Employee where vDepartStaffCode= '" & Trim(code) & "" & "' and vEmpid ='" & stid & "' and id=" & id & ""


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                While myAccessReader.Read()


                    ListItems.Text = numb
                    Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
                    With PrintDocument1.DefaultPageSettings
                        e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                        .PaperSize.Width - .Margins.Right, Y + 95)
                    End With

                    'e.Graphics.DrawString("STUDENT DETAILS", headfont, Brushes.Black, X1 + 210, Y)

                    e.Graphics.DrawString("SURNAME : ", tablefont, Brushes.Black, X1, Y + 110)
                    e.Graphics.DrawString(myAccessReader("vSurname"), titlefont, Brushes.Black, X1 + 150, Y + 110)

                    e.Graphics.DrawString("FIRST NAME : ", tablefont, Brushes.Black, X1, Y + 150)
                    e.Graphics.DrawString(myAccessReader("vfName"), titlefont, Brushes.Black, X1 + 150, Y + 150)


                    e.Graphics.DrawString("MIDDLE NAME : ", tablefont, Brushes.Black, X1, Y + 190)
                    e.Graphics.DrawString(myAccessReader("vMidName"), titlefont, Brushes.Black, X1 + 150, Y + 190)


                    e.Graphics.DrawString("GENDER : ", tablefont, Brushes.Black, X1, Y + 230)
                    e.Graphics.DrawString(myAccessReader("vGender"), titlefont, Brushes.Black, X1 + 150, Y + 230)

                    e.Graphics.DrawString("ADDRESS : ", tablefont, Brushes.Black, X1, Y + 270)
                    e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, X1 + 150, Y + 270)

                    e.Graphics.DrawString("EMAIL : ", tablefont, Brushes.Black, X1, Y + 310)
                    e.Graphics.DrawString(myAccessReader("vEmail"), titlefont, Brushes.Black, X1 + 150, Y + 310)


                    e.Graphics.DrawString("MOBILE PHONE : ", tablefont, Brushes.Black, X1, Y + 350)
                    e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, X1 + 150, Y + 350)

                    e.Graphics.DrawString("HOME PHONE: ", tablefont, Brushes.Black, X1, Y + 390)
                    e.Graphics.DrawString(myAccessReader("vHPhone"), titlefont, Brushes.Black, X1 + 150, Y + 390)

                    e.Graphics.DrawString("QUALIFICATION : ", tablefont, Brushes.Black, X1, Y + 430)
                    e.Graphics.DrawString(myAccessReader("vQualif"), titlefont, Brushes.Black, X1 + 150, Y + 430)


                    e.Graphics.DrawString("GRADE : ", tablefont, Brushes.Black, X1, Y + 470)
                    e.Graphics.DrawString(myAccessReader("vGrade"), titlefont, Brushes.Black, X1 + 150, Y + 470)

                    'e.Graphics.DrawString("POSITION : ", tablefont, Brushes.Black, X1, Y + 500)
                    ' e.Graphics.DrawString(myAccessReader("vPoscode"), titlefont, Brushes.Black, X1 + 150, Y + 500)




                    e.Graphics.DrawString("LAST SCHOOL ATTENDED : ", tablefont, Brushes.Black, X1 + 300, Y + 110)
                    e.Graphics.DrawString(myAccessReader("vLSch_Attended"), titlefont, Brushes.Black, X1 + 490, Y + 110)

                    e.Graphics.DrawString("REGISTRATION DATE : ", tablefont, Brushes.Black, X1 + 300, Y + 150)
                    e.Graphics.DrawString(myAccessReader("dEmpDate"), titlefont, Brushes.Black, X1 + 490, Y + 150)

                    e.Graphics.DrawString(" DATE OF BIRTH: ", tablefont, Brushes.Black, X1 + 300, Y + 190)
                    e.Graphics.DrawString(myAccessReader("dEmpBdate"), titlefont, Brushes.Black, X1 + 490, Y + 190)

                    e.Graphics.DrawString("DEPARTMENT CODE: ", tablefont, Brushes.Black, X1 + 300, Y + 230)
                    e.Graphics.DrawString(myAccessReader("vDepartStaffCode"), titlefont, Brushes.Black, X1 + 490, Y + 230)

                    e.Graphics.DrawString("GRADE : ", tablefont, Brushes.Black, X1 + 300, Y + 270)
                    e.Graphics.DrawString(myAccessReader("vGrade"), titlefont, Brushes.Black, X1 + 490, Y + 270)


                    e.Graphics.DrawString("SALARY GRADE : ", tablefont, Brushes.Black, X1 + 300, Y + 310)
                    e.Graphics.DrawString(myAccessReader("vSalGrade"), titlefont, Brushes.Black, X1 + 490, Y + 310)

                    e.Graphics.DrawString("KNOWING US : ", tablefont, Brushes.Black, X1 + 300, Y + 350)
                    e.Graphics.DrawString(myAccessReader("vHow_Know"), titlefont, Brushes.Black, X1 + 490, Y + 350)

                    e.Graphics.DrawString("NEXT OF KINDS NAME : ", tablefont, Brushes.Black, X1 + 300, Y + 390)
                    e.Graphics.DrawString(myAccessReader("vNear_to_kin"), titlefont, Brushes.Black, X1 + 490, Y + 390)

                    e.Graphics.DrawString("NEXT OF KINDS ADDRESS : ", tablefont, Brushes.Black, X1 + 300, Y + 430)
                    e.Graphics.DrawString(myAccessReader("vNear_to_kinAdd"), titlefont, Brushes.Black, X1 + 490, Y + 430)

                    'e.Graphics.DrawString("NEXT OF KINDS ADDRESS : ", tablefont, Brushes.Black, X1 + 300, Y + 470)
                    'e.Graphics.DrawString(myAccessReader("vNear_to_kinAdd"), titlefont, Brushes.Black, X1 + 490, Y + 470)


                    ro += 1

                    'End If
                End While

                strconss.Close()
                code = ""
            End If



            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try



    End Sub

    Private Sub lst()
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee] "

            ' str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Student] where vstudentid='" & TextBox16.Text & "' "
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'Dim numb As Integer
            While myAccessReader.Read
                numb = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butPrint_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butPrint.Click
        printNo = 1
        Dim Choices As String = ""
        Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

        If Choices = vbYes Then

            Call depts()
            lst()
            PrintBIll()
        End If
    End Sub


    Private Sub Label5_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Label5.Click

    End Sub

    Private Sub TextBox2_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox2.KeyUp
        Try

            TextBox3.Text = ""
            ' ComboBox1.Text = ""

            ' ComboBox2.Text = ""
            ' ComboBox3.Text = ""
            ' TextBox2.Text = ""
            Me.CheckBox1.Checked = False
            Call conns()
            Dim ro As Integer = 0




            str_sql_user_select = "SELECT COUNT(vEmpid) AS [RecordCount] FROM  [Employee] "

            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer = 0
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ro = 0





                str_sql_user_select = "SELECT * FROM Employee  where vSurname  like '" & TextBox2.Text & "%' "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))

                dtptEdit.Rows.Add(rows)

                While myAccessReader.Read()

                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vPosCode")
                    'dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vTeachingStaff")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vSalGrade")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("dEmpdate")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vQualif")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("dEmpBdate")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHow_Know")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vLSch_Attended")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vNear_to_kin")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("vDepartStaffCode")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("vProfession")
                    dtptEdit.Rows(ro).Cells(19).Value = myAccessReader("vGrade")
                    dtptEdit.Rows(ro).Cells(20).Value = myAccessReader("vNear_to_kinAdd")
                    'dtptEdit.Rows(ro).Cells(23).Value = myreader("vcouseCode")
                    dtptEdit.Rows(ro).Cells(21).Value = myAccessReader("id")


                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While
                strconss.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox2.TextChanged

    End Sub

    Private Sub TextBox3_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox3.KeyUp
        Try

            TextBox2.Text = ""
            ' ComboBox1.Text = ""

            ' ComboBox2.Text = ""
            ' ComboBox3.Text = ""
            ' TextBox2.Text = ""
            Me.CheckBox1.Checked = False
            Call conns()
            Dim ro As Integer = 0




            str_sql_user_select = "SELECT COUNT(vEmpid) AS [RecordCount] FROM  [Employee] "

            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer = 0
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ro = 0





                str_sql_user_select = "SELECT * FROM Employee  where vFName  like '" & TextBox3.Text & "%' "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))

                dtptEdit.Rows.Add(rows)

                While myAccessReader.Read()

                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vPosCode")
                    'dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vTeachingStaff")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vSalGrade")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("dEmpdate")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vQualif")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("dEmpBdate")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHow_Know")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vLSch_Attended")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vNear_to_kin")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("vDepartStaffCode")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("vProfession")
                    dtptEdit.Rows(ro).Cells(19).Value = myAccessReader("vGrade")
                    dtptEdit.Rows(ro).Cells(20).Value = myAccessReader("vNear_to_kinAdd")
                    'dtptEdit.Rows(ro).Cells(23).Value = myreader("vcouseCode")
                    dtptEdit.Rows(ro).Cells(21).Value = myAccessReader("id")



                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While
                strconss.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox3_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox3.TextChanged

    End Sub
    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        printNo = 0
        PrintPreviewDialog1.Width = 1500
        PrintPreviewDialog1.Height = 1200
        PrintPreviewDialog1.AutoSizeMode = False
        PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True

        Call depts()
        lst()
        PrintBIll()
    End Sub
End Class