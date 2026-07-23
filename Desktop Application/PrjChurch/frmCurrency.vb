Imports System.Data.OleDb
Public Class frmCurrency

    Private Moni As String
    Private Sub frmCurrency_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.Left = 0
            Me.Top = 100
            Me.MdiParent = mdiChurch

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Currency1]"
            ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then
                conns()

                str_sql_user_select = "SELECT * FROM  Currency1 "

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)


                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                Dim ro As Integer = 0
                While myAccessReader.Read()


                    Moni = myAccessReader("vSC_Name")

                    ro += 1

                End While
                strconss.Close()


                If Moni = "" Then
                    Me.btngo.Enabled = True
                    'Me.butDelete.Enabled = False
                End If
                If Trim(Moni) & "" = "Naira" Then
                    Me.RadioButton1.Checked = True
                End If

                If Trim(Moni) & "" = "Cedis" Then
                    Me.RadioButton3.Checked = True
                End If

                If Trim(Moni) & "" = "Others" Then
                    Me.RadioButton2.Checked = True
                End If

                If Trim(Moni) & "" <> "" Then
                    'Me.butDelete.Enabled = True
                    Me.btngo.Enabled = False
                End If
            End If


            If Moni = "" Then
                Me.btngo.Enabled = True
                ' Me.butDelete.Enabled = False
            End If

            If Moni <> "" Then
                'Me.butDelete.Enabled = True
                Me.btngo.Enabled = False
            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub btngo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btngo.Click
        Try

            If Me.RadioButton1.Checked = True Then
                Moni = "Naira"
            End If

            If Me.RadioButton2.Checked = True Then
                Moni = "Others"
            End If

            If Me.RadioButton3.Checked = True Then
                Moni = "Cedis"
            End If
            Call conns()



            Dim ids As Integer
            ids = 1

            Dim sqlString As String
            sqlString = "INSERT INTO  [Currency1]([id],[vSC_Name]) VALUES(" & _
                      "" & ids & "," & _
                      "'" & Moni & " ')"


            'comUserSelect = New SqlCommand(sqlString, mycon)
            ' comUserSelect.ExecuteNonQuery()
            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            strconss.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Information")

            btngo.Enabled = False

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub Edit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Edit.Click
        Try
            If Me.RadioButton1.Checked = True Then
                Moni = "Naira"
            End If

            If Me.RadioButton2.Checked = True Then
                Moni = "Others"
            End If

            If Me.RadioButton3.Checked = True Then
                Moni = "Cedis"
            End If

            Dim sqlString As String
            conns()
            sqlString = "UPDATE  [Currency1] SET " & _
                     "[vSC_Name] = '" & Moni & "'" & _
                    "WHERE id = " & 1 & ""



            ' comUserSelect = New SqlCommand(sqlString, mycon)
            ' comUserSelect.ExecuteNonQuery()
            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            MsgBox("Data has been Edited", MsgBoxStyle.Information, "Edit")

            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub
End Class