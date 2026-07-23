Imports System.Data.OleDb
Public Class frmEmpsalpuup

    Private Sub frmEmpsalpuup_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.MdiParent = mdiChurch


        Me.Top = 310
        Me.Left = 500
        Me.Width = 500
        Me.Height = 308

    End Sub

    Private Sub frmEmpsalpuup_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmEmpsalpuup_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.MdiParent = mdiChurch


            Me.Top = 310
            Me.Left = 500
            Me.Width = 500
            Me.Height = 308

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee]"

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                Call conns()
                str_sql_user_select = "SELECT vEmpid,vSurname,vFName,vDepartStaffCode  FROM Employee"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtEmpsal.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()
                    'reading from the datareader
                    dtEmpsal.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtEmpsal.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtEmpsal.Rows(ro).Cells(2).Value = myAccessReader("vFName")
                    dtEmpsal.Rows(ro).Cells(3).Value = myAccessReader("vDepartStaffCode")

                    ro += 1

                End While

                ' myreader.Close()
                strconss.Close()


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

                End While
                myAccessReader.Close()
                strconss.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub dtEmpsal_CellClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtEmpsal.CellClick
        Me.BringToFront()
    End Sub

    Private Sub dtEmpsal_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtEmpsal.CellContentClick

    End Sub

    Private Sub dtEmpsal_CellDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtEmpsal.CellDoubleClick
        Try
            frmSalary.Empsal = dtEmpsal.CurrentRow.Cells(0).Value
            'frmEmployeeEdit.EmpEdit = dtEmpsal.CurrentRow.Cells(0).Value
            'frmSalaryEdit.EmpEdits = dtEmpsal.CurrentRow.Cells(0).Value

            frmSalary_Cancel.EmpEdits = dtEmpsal.CurrentRow.Cells(0).Value

            frmsalReport.EmpEditRP = dtEmpsal.CurrentRow.Cells(0).Value
            If CheckBox2.Checked = False Then
                Me.Close()
                Exit Sub
            End If
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub dtEmpsal_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtEmpsal.DoubleClick
        Try
            frmSalary.Empsal = dtEmpsal.CurrentRow.Cells(0).Value
            'frmEmployeeEdit.EmpEdit = dtEmpsal.CurrentRow.Cells(0).Value
            'frmSalaryEdit.EmpEdits = dtEmpsal.CurrentRow.Cells(0).Value
            frmSalary_Cancel.EmpEdits = dtEmpsal.CurrentRow.Cells(0).Value
            frmsalReport.EmpEditRP = dtEmpsal.CurrentRow.Cells(0).Value
             If CheckBox2.Checked = False Then
                Me.Close()
                Exit Sub
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox1.SelectedIndexChanged
        Try
            TextBox2.Text = ""
            Call conns()
            Dim ro As Integer = 0
            str_sql_user_select = "SELECT COUNT(vDepartStaffCode) AS [RecordCount] FROM  [Employee] where  vDepartStaffCode= '" & Trim(TextBox1.Text) & "" & "' "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer = 0
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            dtEmpsal.Rows.Clear()
            Call conns()
            ro = 0
            str_sql_user_select = "SELECT vEmpid,vSurname,vFName,vDepartStaffCode FROM Employee  where vDepartStaffCode= '" & Trim(TextBox1.Text) & "" & "' "


            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            ' dt.Columns.Add("description", GetType(String))
            If rows = 0 Then
                MsgBox("Data not Existing ", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            dtEmpsal.Rows.Add(rows)

            While myAccessReader.Read()

                'reading from the datareader

                dtEmpsal.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                dtEmpsal.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                dtEmpsal.Rows(ro).Cells(2).Value = myAccessReader("vFName")
                dtEmpsal.Rows(ro).Cells(3).Value = myAccessReader("vDepartStaffCode")




                'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                ro += 1

                'End If
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
            TextBox2.Text = ""
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Employee]"
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then
                dtEmpsal.Rows.Clear()
                Call conns()
                str_sql_user_select = "SELECT  * FROM Employee"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                dtEmpsal.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()
                    'reading from the datareader
                    dtEmpsal.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                    dtEmpsal.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtEmpsal.Rows(ro).Cells(2).Value = myAccessReader("vFName")
                    dtEmpsal.Rows(ro).Cells(3).Value = myAccessReader("vDepartStaffCode")
                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                End While

                ' myreader.Close()
                strconss.Close()



                Call conns()
                TextBox1.Items.Clear()
                TextBox1.Text = ""

                ' str_sql_user_select = "SELECT DISTINCT(vSection)AS [RecordYear]  FROM student "
                str_sql_user_select = "SELECT  DISTINCT(vDepartStaffCode)AS [RecordYear]FROM Employee "



                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                'Dim ro As Integer = 0
                ro = 0
                While myAccessReader.Read()

                    TextBox1.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                myAccessReader.Close()
                strconss.Close()

            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox2_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox2.KeyUp
        Try
            TextBox1.Text = ""
            CheckBox1.Checked = False
            dtEmpsal.Rows.Clear()



            Call conns()
            Dim ro As Integer = 0
            str_sql_user_select = "SELECT COUNT(vDepartStaffCode) AS [RecordCount] FROM  [Employee]  "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer = 0
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            dtEmpsal.Rows.Clear()
            Call conns()
            ro = 0
            str_sql_user_select = "SELECT * FROM Employee  where     vSurname  like '" & TextBox2.Text & "%' "


            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            ' dt.Columns.Add("description", GetType(String))

            dtEmpsal.Rows.Add(rows)

            While myAccessReader.Read()



                dtEmpsal.Rows(ro).Cells(0).Value = myAccessReader("vEmpid")
                dtEmpsal.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                dtEmpsal.Rows(ro).Cells(2).Value = myAccessReader("vFName")
                dtEmpsal.Rows(ro).Cells(3).Value = myAccessReader("vDepartStaffCode")
                'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                ro += 1

                'End If
            End While
            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox2.TextChanged

    End Sub
End Class